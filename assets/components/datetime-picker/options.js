export default function mostraDatePicke(elementos, bodyType = 'modal') {

    const datePicker = MCDatepicker.create({
        el: elementos,
        dateFormat: 'DD/MM/YYYY',
        customWeekDays: ['Domino', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        customMonths: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        //bodyType: 'inline',
        bodyType: bodyType,

        autoClose: false,
        closeOndblclick: true,
        closeOnBlur: true,

        disableDates: [],
        customOkBTN: 'OK',
        customClearBTN: 'Limpar',
        customCancelBTN: 'CANCELAR',

        jumpToMinMax: true,
        jumpOverDisabled: true,

    })

    return datePicker;

}