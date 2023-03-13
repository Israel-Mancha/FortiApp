const progressBar = document.querySelector('.progress');
const boxBar = document.querySelector('.box');
let progress = 100;

setInterval(() => {
  progress--;
  progressBar.style.width = `${progress}%`;

  if (progress <= 60) {
    boxBar.style.backgroundColor = '#fffcbd';
    progressBar.style.backgroundColor = '#FFFB02';
  }

  if (progress <= 30) {
    boxBar.style.backgroundColor = '#f7acab';
    progressBar.style.backgroundColor = '#E91411';
  }

  if (progress === 0) {
    clearInterval();
    /* alert('¡Tiempo terminado!'); */
  }
}, 300);
