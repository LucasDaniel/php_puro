
/**
 * Função que modifica o telefone para o formato (xx)xxxxx-xxxx
 * 
 * @example 
 *   exemplo(31987654321); // (31)98765-4321
 * 
 * @param   {string} telefone Parametro obrigatório
 * @returns {string}
 */
function formatTelefone(telefone) {
    telefone = telefone.replace(/[^0-9]+/g, "");
    if (telefone.length > 1) {
        telefone = "("+telefone.substring(0,2)+")"+telefone.substring(2);
    }
    if (telefone.length > 9) {
        telefone = telefone.substring(0,9)+"-"+telefone.substring(9,13);
    }
    return telefone;
}

/**
 * Função que modifica a data para o formato xx/xx/xxxx
 * 
 * @example 
 *   exemplo(12011987); // 12/01/1987
 * 
 * @param   {string} data Parametro obrigatório
 * @returns {string}
 */
function formatData(data) {
    data = data.replace(/[^0-9]+/g, "");
    if (data.length > 2) {
        data = data.substring(0,2)+"/"+data.substring(2);
    }
    if (data.length > 5) {
        data = data.substring(0,5)+"/"+data.substring(5,9);
    }
    return data;
}

/**
 * Função que verifica se as senhas são diferentes
 *   se forem mostra um alert pro usuario
 * 
 * @param   {string} senha   Parametro obrigatório
 * @param   {string} resenha   Parametro obrigatório
 * @returns {void}
 */
function verificaSenhas(senha,resenha) {
    if (senha.length == resenha.length) {
        if (senha != resenha) {
            alert("senhas não são iguais");
        }
    }
}

/**
 * Função que verifica se as senhas do input são diferentes
 *   se forem mostra um alert pro usuario
 * 
 * @param   {string} senha   Parametro obrigatório
 * @param   {string} resenha   Parametro obrigatório
 * @returns {void}
 */
function cadastraCliente() {
    senha   = $("#senha").val();
    resenha = $("#resenha").val();
    if (senha != resenha) {
        alert("Senhas não conferem");
    }
}

/**
 * Executado no momento em que o documento esta pronto para ser utilizado
 */
$(document).ready(function(){

    //Quando o usuario escrever no input text 'telefone' vai chamar a função 'formatTelefone' passando por
    //parametro o input text 'telefone' e modificando-o para o formato correto
    $("#telefone").keyup(function(){
        $("#telefone").val(formatTelefone($("#telefone").val()));
    });

    //Quando o usuario escrever no input text 'nascimento' vai chamar a função 'formatData' passando por
    //parametro o input text 'nascimento' e modificando-o para o formato correto
    $("#nascimento").keyup(function(){
        $("#nascimento").val(formatData($("#nascimento").val()));
    });

    //Quando o usuario escrever na 'resenha' vai chamar a função 'verificaSenhas' passando por
    //parametro o input text 'senha' e 'resenha' e verificando se os dois são diferentes, se forem, mostra um alert
    $("#resenha").keyup(function(){
        verificaSenhas($("#senha").val(),$("#resenha").val());
    });
    //Quando o usuario escrever na 'senha' vai chamar a função 'verificaSenhas' passando por
    //parametro o input text 'senha' e 'resenha' e verificando se os dois são diferentes, se forem, mostra um alert
    $("#senha").keyup(function(){
        verificaSenhas($("#senha").val(),$("#resenha").val());
    });

    //executa a função 'formatData' passando por parametro o input text 'nascimento' 
    //modificando-o para o formato correto
    $("#nascimento").val(formatData($("#nascimento").val()));

    //executa a função 'formatTelefone' passando por parametro o input text 'telefone' 
    //modificando-o para o formato correto
    $("#telefone").val(formatTelefone($("#telefone").val()));
});
