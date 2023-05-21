import DragDrop from "/tusk/js/modules/dragdrop.js";
import Editor from "/tusk/js/modules/editor.js";

export default class LayoutElements {
	constructor() {
		this.DragDrop = new DragDrop();
		this.elements = document.querySelectorAll('.layout-element');
		this.DragDrop.loadElements(this.elements, this.setPosition);
	}

	setModal(modal) {
		modal.addEventListener('modalOpen', (event) => this.initForm(event));
		modal.addEventListener('modalClosed', (event) => this.onDispatch(event));
	}

	initForm(event) {
		let modal = event.detail;
		let form = modal.modalMain.querySelector('form');

		this.editor = new Editor('editor');

		form.addEventListener('submit', (event) => {
			// this.editor.destroy();
			event.preventDefault();
			fetch(form.getAttribute('action'), {
				method: 'POST',
				body: new FormData(form)
			}).then(response =>  response.json())
			.then((json) => {
				if (json.status != 200) {
					throw new Exception('something went wrong');
				}
				console.log(json.message);
				modal.closeModal()
			})
			.catch(err => console.log(err))
		})
	}

	onDispatch(event) {
		let button = event.detail;
		this.element = button.parentNode.parentNode;
		let id = this.readId(this.element);

		if (!id) {
			window.location.reload();
		}

		fetch('/tusk/contents/element/' + id, {
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			}
		}).then(response => response.text()).then(text => this.updateContent(text)).catch();
	}

	updateContent(content) {
		if (!content.length) {
			this.element.remove();
			return;
		}
		
		let container = this.element.querySelector('.element-container');
		if (container) {
			container.innerHTML = content;
		}
	}

	readId(element) {
		return element.id.replace('element-', '');
	}

	setPosition(element, position) {
		let id = element.id.replace('element-', '');

		if (position < 0) {
			position = 0;
		}

		fetch('/tusk/contents/change/' + id + "?" + new URLSearchParams({
			key: 'position',
			value: position
		}), {
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			}
		})
		.then(response => response.json())
		.then(json => console.log(json))
		.catch();
	}

}