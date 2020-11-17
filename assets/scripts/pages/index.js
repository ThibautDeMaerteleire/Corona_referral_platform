import { Homepage } from './home.js';
import { Overonspage } from './overons.js';
import { SearchPage } from './search.js';

export const LaunchPages = () => {
  new Homepage();
  new Overonspage();
  new SearchPage();
};