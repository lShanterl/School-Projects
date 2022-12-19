import './App.css'
import Hero from './components/Hero/hero'
import Footer from './components/Footer/footer'
import ShelterContent from './components/ShelterCards/ShelterContent'
import ResetScrollPosition from './components/body/resetScroll'


const App = () => { 

  return (

    <div className="App">
        <ResetScrollPosition />
        <Hero hero_image='assets/hero.jpg' header='Schroniska' sub_text='W Beskidzie Śląskim'/>
        <ShelterContent />
        <Footer />
    </div>

  )
}

export default App
