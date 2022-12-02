import { useState } from 'react'
import reactLogo from './assets/react.svg'
import './App.css'
import Hero from './components/Hero/hero'
import HorizontalScroll from './components/Scrolling/horizontal'
import Footer from './components/Footer/footer'
import ShelterContent from './components/ShelterCards/ShelterContent'


const App = () => { 
  return (
    <div className="App">
        <Hero hero_image='src/assets/images/hero.jpg'/>
        <ShelterContent />
        <Footer />
    </div>
  )
}

export default App
