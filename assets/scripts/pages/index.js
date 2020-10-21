import {Homepage} from './home.js';

export const LaunchPages = () => {
  switch (window.location.pathname) {
    case "/":
      new Homepage();
      break;
    
    default:
      break;
  }
};