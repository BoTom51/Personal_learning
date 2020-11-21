function doubleCssToggleOnEvent(elem, classe, delay) {
	elem.classList.toggle(classe);
	setTimeout(() => {
		elem.classList.toggle(classe);
	}, delay);
 }