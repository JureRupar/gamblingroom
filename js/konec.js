var secondsLeft = 10;

function redirTimer() {
    const countdownElement = document.getElementById("cnt");
    const interval = setInterval(function() {
        if (secondsLeft == 0) {
            clearInterval(interval);
            location.href = "index.php";
        } else {
            countdownElement.innerHTML = "Nazaj na začetek čez: " + secondsLeft;
            secondsLeft--;
        }
    }, 1000);
}

document.addEventListener('DOMContentLoaded', function() {
    redirTimer();

    $('#fireworks').fireworks({
        sound: false,
        opacity: 0.9,
        width: '100%',
        height: '100%'
    });
});