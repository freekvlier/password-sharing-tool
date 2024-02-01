import './bootstrap';
import {
  Clipboard,
  Datetimepicker,
  Input,
  Ripple,
  initTE,
  Validation,
} from "tw-elements";

initTE({ Clipboard, Input, Ripple, Validation });

const rangeInput = document.getElementById('max_views');
const rangeValueDisplay = document.getElementById('rangeValue');
handleRangeInput();

function handleRangeInput() {
  const currentValue = rangeInput.value;
  rangeValueDisplay.textContent = currentValue;
}

rangeInput.addEventListener('input', handleRangeInput);

const pickerTimeOptions = document.querySelector('#datetimepicker-timeOptions');
new Datetimepicker(pickerTimeOptions, {
  timepicker: { format24: true },
  datepicker: { format: 'dd-mm-yyyy'},
});