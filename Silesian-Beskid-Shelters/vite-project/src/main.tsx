import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App'
import './index.css'
import { BrowserRouter as Router , Route, Link} from 'react-router-dom';
import Wrapper from './Wrapper';




ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
  <React.StrictMode>
      <Wrapper />
  </React.StrictMode>
)


