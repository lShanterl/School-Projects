import './App.css'
import Hero from './components/Hero/hero'
import Footer from './components/Footer/footer'
import ShelterContent from './components/ShelterCards/ShelterContent'

const App = () => { 
  return (
    <div className="App">
        <Hero hero_image='src/assets/images/hero.jpg' header='Schroniska' sub_text='W Beskidzie Śląskim'/>
        <ShelterContent />
        <Footer />
    </div>
  )
}

export default App
