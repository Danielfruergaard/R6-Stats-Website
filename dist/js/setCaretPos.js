//							SET CURSOR POSITION END
function setCaretPosition(ctrl, pos) {
	// Modern browsers
	if (ctrl.setSelectionRange) {
		ctrl.focus();
		ctrl.setSelectionRange(pos, pos);

		// IE8 and below
	} else if (ctrl.createTextRange) {
		var range = ctrl.createTextRange();
		range.collapse(true);
		range.moveEnd('character', pos);
		range.moveStart('character', pos);
		range.select();
	}
}
// give text input id="cursor-end"
var input = document.getElementById('cursor-end');
setCaretPosition(input, input.value.length);

document.onreadystatechange = function() {
	if (document.readyState !== 'complete') {
		document.querySelector('#loader').style.visibility = 'visible';
	} else {
		document.querySelector('#loader').style.display = 'none';
	}
};
