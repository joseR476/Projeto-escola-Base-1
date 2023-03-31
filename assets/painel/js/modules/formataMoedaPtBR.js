export default function formataMoedaPtBR(valor, estilo = '') {
    estilo !== ''
        ? valor = valor.toLocaleString('pt-br', { style: estilo, maximumFractionDigits: 2, minimumFractionDigits: 2, currency: 'BRL' })
        : valor = valor.toLocaleString('pt-br', { maximumFractionDigits: 2, minimumFractionDigits: 2, currency: 'BRL' });
    return valor;
}