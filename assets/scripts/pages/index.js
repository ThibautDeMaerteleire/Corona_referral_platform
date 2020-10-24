import {Homepage} from './home.js';
import {Overonspage} from './overons.js';

export const LaunchPages = () => {
  switch (window.location.pathname) {
    case "/":
      new Homepage();
      break;
    
    case "/overons.php":
      new Overonspage();
      break;
    
    default:
      break;
  }
};