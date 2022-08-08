//時間
function currentTime() {

    const now = new Date();
    let h = now.getHours();
    let m = now.getMinutes();
    let s = now.getSeconds();

    h = leadingZero(h);
    m = leadingZero(m);
    s = leadingZero(s);

    document.getElementById("time").innerHTML = `${h}:${m}:${s}`;
    setTimeout("currentTime()", 1000);

}

function leadingZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}