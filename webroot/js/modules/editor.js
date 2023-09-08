/**
 * @project       rhino
 * @author        carsten.coull@swu.de
 * @build         Fri, Sep 8, 2023 11:37 AM ET
 * @release       656bd8c951d0ae89ed98b06db718f065a8753f28 [main]
 * @copyright     Copyright (c) 2023, SWU Stadtwerke Ulm / Neu-Ulm GmbH
 *
 */
export default class Editor{constructor(e,t){let o="";t.length>0&&(o=JSON.parse(t)),this.editor=new EditorJS({holder:e,tools:{header:{class:Header,inlineToolbar:["link"]},list:List},autofocus:!0,placeholder:"Let`s write an awesome story!",data:o,minHeight:0})}save(){return new Promise(((e,t)=>{this.editor.save().then((t=>{e(t)})).catch((e=>{t(e)}))}))}destroy(){this.editor.destroy()}}