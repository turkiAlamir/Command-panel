var x=document.getElementById('TextA');
document.getElementById('btn-group').addEventListener('click', (event) => {

    if (event.target.id != 'btn-group'&& event.target.value != null) {
        console.log(event.target.value);
        $.post('Table.php', {
            btnValue: event.target.value
        }, (response) => {
            // response from PHP back-end
if(x){
            x.innerHTML = response||null;
}else{ console.log("shit"); }
        });
    }
});