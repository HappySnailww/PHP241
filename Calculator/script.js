const display = document.getElementById('display');

function appendChar(char) {
    display.value += char;
}

function clearDisplay() {
    display.value = '';
}

function calculate() {
    const expression = display.value;
    if (!expression.trim()) return;

    // Отправляем выражение прямо в текущий файл index.php
    fetch('index.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'expression=' + encodeURIComponent(expression)
    })
    .then(response => response.text())
    .then(result => {
        display.value = result;
    })
    .catch(error => {
        console.error('Error:', error);
        display.value = 'Ошибка';
    });
}
