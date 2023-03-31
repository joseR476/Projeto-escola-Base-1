export default function HOME() {
    const partesUrl = location.href.split('/');
    const parteRestoUrl = location.pathname.split('/');
    return partesUrl[0]+'//'+partesUrl[2]+'/'+parteRestoUrl[1];
    //return partesUrl[0]+'//'+partesUrl[2];
}