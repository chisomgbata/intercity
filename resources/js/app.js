import {Alpine, Livewire} from '../../vendor/livewire/livewire/dist/livewire.esm';
import {intersect} from "@alpinejs/intersect/builds/module.js";


Alpine.plugin(intersect);

Livewire.start()
