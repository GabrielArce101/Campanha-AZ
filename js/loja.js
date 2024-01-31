// Script do Carrosel//
const carouselContainer = document.querySelector('.carousel-container');
const carouselControlsContainer = document.querySelector('.carousel-controls');
const carouselControls = ['previous','next'];
const carouselItems = document.querySelectorAll('.carousel-item');

class Carousel{
      constructor(container,items,controls){
      this.carouselContainer = container;
      this.carouselControls = controls;
      this.carouselArray = [...items];
      }

      updateCarousel(){
            this.carouselArray.array.forEach(element => {
                  element.classList.remove('carousel-item-1');
                  element.classList.remove('carousel-item-2');
                  element.classList.remove('carousel-item-3');
                  element.classList.remove('carousel-item-4');
                  element.classList.remove('carousel-item-5');
                  element.classList.remove('carousel-item-6');
            });

            this.carouselArray.slice(0, 5).forEach((el , i) => {
                  el.classList.add(`carousel-item-${i+1}`);
            });
      }
            setCurrentState(direction){
            if (direction == 'carousel-controls-previous'){
                  this.carouselArray.unshift(this.carouselArray.pop());
            }else{
                  this.carouselArray.push(this.carouselArray.shift());
            }
            this.updateCarousel();

      }
            setControls() {
                  this.carouselControls.forEach(control => {
                        carouselControlsContainer.appendChild(document.createElement('button')).className = `carousel-controls-${control}`;
                        document.querySelector(`.carousel-controls-${control}`).innerHTML = control;
                  });
            }

            useControls(){
                  const triggers = [...carouselControlsContainer.childNodes];
                  triggers.forEach(control => {
                        control.addEventListener('click', e =>{
                              e.preventDefault();
                              this.setCurrentState(control.className);
                        });
                  });
            }

}
const exampleCarousel = new Carousel(carouselContainer,carouselItems,carouselControls);

exampleCarousel.setControls();
exampleCarousel.useControls();
