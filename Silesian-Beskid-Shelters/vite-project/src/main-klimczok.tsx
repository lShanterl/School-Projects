import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import Hero from './components/Hero/hero'
import Footer from './components/Footer/footer'
import ShelterDescription from './components/body/shelterDescription'


ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
  <React.StrictMode>
    <Hero hero_image='src/assets/images/klimczok.jpg' header='Schronisko' sub_text='Klimczok'/>
    <ShelterDescription shelter_image='src/assets/images/klimczok.jpg' />
    <Footer />
  </React.StrictMode>
)