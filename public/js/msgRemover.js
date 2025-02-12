function removerMasagen(){
    setTimeout(function(){
        var msgcerto = document.getElementsByClassName('success-message');
        var msgerrado = document.getElementsByClassName('error-message');
        msgerrado.parentNode.removeChild(msgerrado);
        msgcerto.parentNode.removeChild(msgcerto);
    
    }, 3000);    
}
document.onreadystatechange = () => {
    
    if(document.readyState === 'complete')

 
    removerMasagen()
}