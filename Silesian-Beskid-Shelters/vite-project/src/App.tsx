import { useState } from 'react'
import reactLogo from './assets/react.svg'
import './App.css'
import Hero from './components/Hero/hero'
import HorizontalScroll from './components/Scrolling/horizontal'


const App = () => { 
  return (

    <div className="App">
        <Hero />
        <HorizontalScroll  
            Section = {() => {
                return (
                    
                    <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam minima ea modi blanditiis aliquid eaque voluptatibus in facilis id et deleniti, dolores nemo maiores. Officia rerum quod consequuntur iure assumenda.</div>
                )
            }}

        />
        <div className="contentWrapper">
            
            <div className="content">
                <img src="src/images/klimczok.png" alt=""/>
                <a href="src/aboutShelters/klimczok.html"><h2>Klimczok</h2></a>
                <p>Nazwa schroniska nawiązuje do szczytu Klimczoka, znajdującego się w odległości 700 m na zachód od budynku schroniska.</p>
            </div>
            <div className="content">
                <img src="../images/przyslop.jpg" alt=""/>
                <a href=""><h2>Przysłop</h2></a>
                <p>Schronisko PTTK Przysłop Przysłop pod Baranią Górą to często pierwszy lub ostatni nocleg na trasie wędrowców, którzy przechodzą Główny Szlak Beskidzki.</p>
            </div>
            <div className="content">
                <img src="../images/miziowa.jpg" alt=""/>
                <a href=""><h2>Hala Miziowa</h2></a>
                <p>To prawdziwy gigant wśród beskidzkich schronisk, co czuć, kiedy tylko usiądziemy na stołówce, a funkcjonują tutaj aż dwie.</p>
            </div>
            <div className="content">
                <img src="../images/szyndzielnia.jpg" alt=""/>
                <a href=""><h2>Szyndzielnia</h2></a>
                <p>Szyndzielnia to znakomita baza dla rowerzystów i <b>biegaczy</b>, od których latem się tutaj roi.</p>
            </div>
            <div className="content">
                <img src="../images/klimczok.png" alt=""/>
                <a href=""><h2>Klimczok</h2></a>
                <p>Nazwa schroniska nawiązuje do szczytu Klimczoka, znajdującego się w odległości 700 m na zachód od budynku schroniska.</p>
            </div>
            <div className="content"> 
                <img src="../images/klimczok.png" alt=""/>
                <a href=""><h2>Klimczok</h2></a>
                <p>Nazwa schroniska nawiązuje do szczytu Klimczoka, znajdującego się w odległości 700 m na zachód od budynku schroniska.</p>
            </div>
            <div className="content">
                <img src="../images/klimczok.png" alt=""/>
                <a href=""><h2>Klimczok</h2></a>
                <p>Nazwa schroniska nawiązuje do szczytu Klimczoka, znajdującego się w odległości 700 m na zachód od budynku schroniska.</p>
            </div>
            <div className="content">
                <img src="../images/klimczok.png" alt=""/>
                <a href=""><h2>Klimczok</h2></a>
                <p>Nazwa schroniska nawiązuje do szczytu Klimczoka, znajdującego się w odległości 700 m na zachód od budynku schroniska.</p>
            </div>
        </div>
        
        <footer className="footer">
            <div className="footerText">
                <p>&copy; Bartosz Starzyk 2022</p>
            </div>
        </footer>
    
    </div>

  )
}

export default App
