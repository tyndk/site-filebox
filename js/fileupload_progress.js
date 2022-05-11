const reader = new FileReader();
var p=document.getElementById('file_reader').value;

reader.addEventListener('progress', (event) => {
    if (event.loaded && event.total){
        const percent = (event.loaded/event.total)*100;
        progress.value=percent;
        p.value=percent;
        document.getElementById("file_reader").innerHTML = p;
        console.log(percent);
    }
});