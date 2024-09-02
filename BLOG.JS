document.getElementById('next').addEventListener('click',function(event){
        event.preventDefault();
        document.getElementById('pg1').style.display = 'none';
        document.getElementById('pg2').style.display = 'block';
    });
document.getElementById('back').addEventListener('click', function(event){
    event.preventDefault();
    document.getElementById('pg1').style.display = 'block';
    document.getElementById('pg2').style.display = 'none';
});


