function debounce(func, wait) {
    let timer = null;
    return function() {
        clearTimeout(timer);
        timer = setTimeout(func, wait);
    }
}

export default debounce;