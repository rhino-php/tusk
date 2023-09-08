/**
 * @project       rhino
 * @author        carsten.coull@swu.de
 * @build         Fri, Sep 8, 2023 11:37 AM ET
 * @release       656bd8c951d0ae89ed98b06db718f065a8753f28 [main]
 * @copyright     Copyright (c) 2023, SWU Stadtwerke Ulm / Neu-Ulm GmbH
 *
 */
import Modal from"/tusk/js/modules/modal.js";import LayoutElements from"/tusk/js/modules/elements.js";class Layout{constructor(){window.onload=()=>this.init()}init(){this.modal=new Modal,this.elements=new LayoutElements,this.elements.setModal(this.modal.modal)}}new Layout;