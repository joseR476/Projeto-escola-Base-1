import trocaCaracter from "./trocaCaracter.js";

export default function trataValor(valor){
    valor = trocaCaracter(valor.toString(), '.', '');
    valor = trocaCaracter(valor.toString(), ',', '.');
    return valor;
}