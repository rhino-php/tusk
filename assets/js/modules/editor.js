import * as EditorJS from '../vendor/editor.js';
// import * as Header from '/tusk/js/vendor/bundle.js';
// import List from '@editorjs/list';

export default class Editor {
	constructor(selector) {
		this.editor = new EditorJS.EditorJS({
			/** 
			 * Id of Element that should contain the Editor 
			 */
			holder: selector,
	
			/** 
			 * Available Tools list. 
			 * Pass Tool's class or Settings object for each Tool you want to use 
			 */
			tools: {
				// header: {
				// 	class: Header,
				// 	inlineToolbar: ['link']
				// },
				// list: {
				// 	class: List,
				// 	inlineToolbar: true
				// }
			},
		});
	}
}