import './bootstrap';

import Alpine from 'alpinejs';

import 'preline';

window.Alpine = Alpine;

Alpine.start();

import {
    Collapse,
    Dropdown,
    Ripple,
    initTWE,
  } from "tw-elements";
  
initTWE({ Collapse, Dropdown, Ripple });
  

import { Tooltip } from 'tw-elements';

const myTooltip = new Tooltip(document.getElementById('my-tooltip'));