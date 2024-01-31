<?php

    namespace App\Db;

    //Como iremos utilizar o PDO no sistema temos que definí-lo como uma dependência da classe 'Database'.
    //Para isso usaremos a linha de código abaixo:
    use PDO;

    //Apenas use durante o modo de desenvolvimento como mencionado no comentário na linha 86
    use PDOException;

    class Database{
        //Dentro da classe 'Database' serão definidos os valores das credenciais de acesso
        // ao bando de dados e por isso elas serão constantes ('const') e algumas
        // informações variáveis dentro da classe
        /**
         * Host de conexão com o banco de dados
         * @var string
         */
        const HOST = 'localhost';

        /**
         * Nome do banco de dados
         * @var string
         */
        const NAME = 'AZMerit-2';

        /**
         * Usuário do banco de dados
         * @var string
         */
        const USER = 'postgres';
        
        /**
         * Senha de acesso ao banco de dados
         * @var string
         */
        const PASS = '1234';

        /**
         * Nome da table a ser manipulada
         * @var string
         */
        private $table;


        // A propriedade '$connection' será uma instância de PDO
        /**
         * Instância de conexão com o banco de dados
         * @var PDO
         */
        private $connection;

        /**
         * Define a tabela e instancia a conexão
         * @param string $table
         */
        public function __construct($table = null){
            $this->table = $table;
            //Como o código para a instância do PDO leva muitas linhas será criado o método abaixo:
            $this->setConnection();
        }
        
        /**
         * Método responsável por criar uma conexão com o banco de dados
         */
        private function setConnection(){
            //Ao utilizar o 'try/catch' a gente deixa o programa mais seguro para que
            // sejam tratados os possíveis erros que hajam no sistema.
            try{
                $this->connection = new PDO('pgsql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
                //Já que estamos trabalhando com as 'querys' dentro do banco de dados o PDO
                // não irá travar o nosso sistema caso haja algum erro na query. Ele apenas
                // irá informar com um 'WARNING'. Para isso precisamos tratar de uma outra forma
                // esse dado porque é interessante travar o sistema já que não queremos que ele
                // execute mais nada depois desse erro. E para gerar o 'FATAL ERRO' e travar o sistema
                // utilizamos a próxima lina de código que recebe 2 parâmetros.
                //O primeiro atributo é o que desejamos alterar e o segundo é o valor novo que
                // irá receber.
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            //Aconselhado usar a 'PDOException' do que a 'Exception' para gerenciar as exceções
            catch(PDOException $e){
                //Usar 'die('Error: '.$e->getMessage());' apenas durante o desenvolvimento do
                // aplicativo fechado para que a mensagem de erro não seja exposta pro usuário final.
                //O aconselhado é exibir uma mensagem mais amigável para o usuário final e gravar
                // a mensagem de erro real no seu registro de erros (error log) para que os dados
                // dos erros fiquem disponíveis apenas internamente.
                die('Error: '.$e->getMessage());
            }
        }

        /**
         * Método responsável por inserir dados no banco
         * @param array $values [field => value]
         * @return integer ID inserido
         */
        public function insert($values){
            //DADOS DA QUERY:
            $fields = array_keys($values);
            $binds = array_pad([],count($fields),'?');

            //O PDO ajuda a tratar o SQL injection para isso podemos passar os valores como parâmetros
            // dinâmicos e no momento da execução da query o PDO faz a validação para ver se os dados
            // passados são realmente seguros para serem inseridos no banco de dados.

            //MONTA A QUERY:
            $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

            //EXECUTA O INSERT
            $this->execute($query, array_values($values));
            
            //RETORNA O ID INSERIDO
            return $this->connection->lastInsertId();
        }

        //Como todas as querys que montarmos teremos que fazer o mesmo padrão de execução podemos
        // padronizar criando um método único para além de montar a query executá-la também.
        /**
         * Método responsável por executar queries dentro do banco de dados
         * @param string $query
         * @param array $params
         * @return PDOStatement
         */
        public function execute($query,$params = []){
            try{
                $statement = $this->connection->prepare($query);
                $statement->execute($params);
                return $statement;
            }
            catch(PDOException $e){
                die('ERROR: '.$e->getMessage());
            }
        }

        /**
         * Método responsável por executar uma consulta no banco
         * @param string $where
         * @param string $order
         * @param string $limit
         * @param string $fields
         * @return PDOStatement
         */
        public function select($where = null, $order = null, $limit = null, $fields = '*'){
            //DADOS DA QUERY
            //É feita uma condição ternária (n=3) para dar valores caso existam algum valor na variável
            $where = !empty($where) ? 'WHERE '.$where : '';
            $order = !empty($order) ? 'ORDER BY '.$order : '';
            $limit = !empty($limit) ? 'LIMIT '.$limit : '';

            //MONTA A QUERY
            $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

            //EXECUTA A QUERY
            return $this->execute($query);
        }

        /**
         * Método responsável por executar atualizações no banco de dados
         * @param string $where
         * @param array $values [ field => value ]
         * @return boolean
         */
        public function update($where, $values){
            //DADOS DA QUERY
            $fields = array_keys($values);

            //MONTA A QUERY
            $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

            //EXECUTAR A QUERY
            $this->execute($query,array_values($values));

            return true;
        }

        /**
         * Método responsável por excluir dados do banco de dados
         * @param string $where
         * @return boolean
         */
        public function delete($where){
            //MONTA A QUERY
            $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

            //EXECUTA A QUERY
            $this->execute($query);

            //RETORNA SUCESSO
            return true;
        }
    }

?>