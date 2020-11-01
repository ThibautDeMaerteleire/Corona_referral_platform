import {SmallCards} from './small-cards.js';
import {Tables} from './tables.js';
import {Buttons} from './buttons.js';
import {AddCovidTest} from './addcovidtest.js';
import { AutocompleteSearch } from './autocompleteSearch.js';

export const LaunchComponents = () => {
  new SmallCards();
  new Tables();
  new Buttons();
  new AddCovidTest();
  new AutocompleteSearch();
};