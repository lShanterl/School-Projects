import React from 'react'
import ReactDOM from 'react-dom/client'
import Contact from './components/contact/contact'
import './index.css'
import ResetScrollPosition from './components/body/resetScroll'

const MainContact = () => {
  return (
    <div>
    <ResetScrollPosition />
    <Contact />
    </div>
  )
}
export default MainContact;


