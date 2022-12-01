import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import './klimczok.tsx'
import Shelter from './klimczok'

ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
  <React.StrictMode>
    <Shelter />
  </React.StrictMode>
)