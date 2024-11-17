import { CountUp } from 'countup.js';

const
   month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
   week = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];

document.addEventListener('DOMContentLoaded', () => {
   // Инициализация анимации для всех элементов с суммой
   document.querySelectorAll('.sales-amount').forEach((element) => {
      const amount = element.getAttribute('data-amount');
      const countUp = new CountUp(element, amount, { duration: 2 });
      if (!countUp.error) {
         countUp.start();
      } else {
         console.error(countUp.error);
      }
   });

   // Инициализация пончикового графика для всех элементов canvas
   document.querySelectorAll('.sales-chart').forEach((chart) => {
      new Chart(chart.getContext('2d'), {
         type: 'doughnut',
         data: {
            labels: ['Левый носок', 'Правый носок', 'Шапка', 'Трусы со стразами'],
            datasets: [{
               data: [40, 25, 20, 15],
               backgroundColor: ['#4CAF50', '#FF9800', '#03A9F4', '#E91E63'],
               hoverBackgroundColor: ['#66BB6A', '#FFB74D', '#29B6F6', '#F06292'],
               borderWidth: 2,
               borderColor: '#ffffff'
            }]
         },
         options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
               legend: {
                  position: 'bottom',
                  labels: { font: { size: 12 }, color: '#4a5568' }
               }
            }
         }
      });
   });
});


//Про посетителей сайта

//Рандомайзер чисел для масива
function generateRandomArray(length, min = 1, max = 100) {
   return Array.from({ length }, () => Math.floor(Math.random() * (max - min + 100)) + min);
}
const lastMonthNumbers = generateRandomArray(30, 10, 14);
const currentMonthNumbers = generateRandomArray(30, 10, 20);
const users = generateRandomArray(30);

const visitor = new Chart(document.getElementById("visitors"), {
   type: 'line', // или другой тип графика
   data: {
      labels: month,
      datasets: [
         //Прошлый месяц
         {
            label: 'Прошлый месяц',
            data: lastMonthNumbers,
            borderColor: '#2918ff',
            borderWidth: 2,
            fill: false,
            tension: 0.1
         },
         //Текущий месяц
         {
            label: 'Текущий месяц',
            data: currentMonthNumbers,
            borderColor: '#ff3218',
            borderWidth: 4,
            fill: false,
            tension: 0.1
         },
         //Users
         {
            label: 'Пользователи',
            data: users,
            borderColor: "#20ff18",
            borderWidth: 2,
            fill: false,
            tension: 0.1
         }
      ]
   },
   options: {
      responsive: false,
      animation: true
   }
});

setInterval(() => {
const newNumber = Math.floor(Math.random() * 100) + 1;
visitor.data.datasets[1].data[visitor.data.datasets[0].data.length - 1] = newNumber;
visitor.update();
console.log('update right');
}, 100);


//Самые продаваемые товары

let salesMount = generateRandomArray(63, 74, 10);
let salesWeek = generateRandomArray(30, 47, 10);
let SalesPeak = generateRandomArray(39, 74, 50);

const sales = new Chart(document.getElementById('sale'), {
   type: 'line', // или другой тип графика
   data: {
      labels: month,
      datasets: [
         {
            label: 'Продажи за месяц',
            data: salesMount,
            fill: false,
            borderColor: 'rgba(78, 115, 223, 0.8)',
            tension: 0.2
         },
         {
            label: 'Продажи за неделю',
            data: salesWeek,
            fill: false,
            borderColor: 'rgba(28, 200, 138, 0.8)',
            tension: 0.2
         },
         {
            label: 'Самый продаваемый товар месяца',
            data: SalesPeak,
            fill: false,
            borderColor: 'rgba(255, 99, 132, 0.8)',
            tension: 0.2
         },
      ]
   }
},);