document.addEventListener('DOMContentLoaded', function () {
    // id таймера (для того, чтобы можно было его убрать)
    let timerId = null;
    // вычисляем разницу дат и устанавливаем оставшееся времени в качестве содержимого элементов
    function countdownTimer() {
      // проверяем, сколько времени осталось
      const diff = deadline - new Date();
      if (diff <= 0) {
        clearInterval(timerId);
        //если время вышло - убираем блок
        document.querySelector('.topright').style.display="none";
      }
      //разбиваем полученные данные на дни, часы, минуты
      const days = diff > 0 ? Math.floor(diff / 1000 / 60 / 60 / 24) : 0;
      const hours = diff > 0 ? Math.floor(diff / 1000 / 60 / 60) % 24 : 0;
      const minutes = diff > 0 ? Math.floor(diff / 1000 / 60) % 60 : 0;
      const seconds = diff > 0 ? Math.floor(diff / 1000) % 60 : 0;
      $days.textContent = days < 10 ? '0' + days : days;
      $hours.textContent = hours < 10 ? '0' + hours : hours;
      $minutes.textContent = minutes < 10 ? '0' + minutes : minutes;
      $seconds.textContent = seconds < 10 ? '0' + seconds : seconds;
    }
    // получаем элементы, содержащие компоненты даты и записываем полученное время в них
    const $days = document.querySelector('.timer__days');
    const $hours = document.querySelector('.timer__hours');
    const $minutes = document.querySelector('.timer__minutes');
    const $seconds = document.querySelector('.timer__seconds');
    // вызываем функцию отсчета
    countdownTimer();
    // вызываем функцию отсчета каждую секунду
    timerId = setInterval(countdownTimer, 1000);
  });