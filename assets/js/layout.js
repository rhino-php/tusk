import Modal from "/tusk/js/modules/modal.js";
import LayoutElements from "/tusk/js/modules/elements.js";

class Layout {
	constructor() {
		window.onload = () => this.init();
	}
	
	init() {
		this.modal = new Modal();
		this.elements = new LayoutElements();
		this.elements.setModal(this.modal.modal);
	}
}

new Layout();