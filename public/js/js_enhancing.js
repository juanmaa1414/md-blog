(function () {
	
	/**
	 * Appends a hidden input in a form element with the desired name and value.
	 * @param {type} name
	 * @param {type} value
	 * @returns {undefined}
	 */
	HTMLFormElement.prototype.appendDataField = function (name, value) {
		var input = document.createElement("input");
		input.type = 'hidden';
		input.name = name;
		input.value = value;
		this.appendChild(input);
	};
})();