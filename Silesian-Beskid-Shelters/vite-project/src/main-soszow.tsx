import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import Hero from './components/Hero/hero'
import Footer from './components/Footer/footer'
import ShelterDescription from './components/body/shelterDescription'


ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
  <React.StrictMode>
    <Hero hero_image='src/assets/images/soszowHero.jpg' header='Schronisko' sub_text='Soszów'/>
    <ShelterDescription 
    shelter_image='src/assets/images/klimczok.jpg' 
    image1='src/assets/images/soszow1.jpeg'
    image2='' 
    head1='Historia' 
    head2='' 
    text1='Wybudowane w 1932 roku prywatne
    schronisko posiadało 40 miejsc noclegowych i zostało wybudowane przez Pawła Poloka. Później schronisko prowadziła córka Poloka, Anna wraz z mężem Janem Gajdzicą.
    Na początku drugiej wojny światowej, Gajdzicę wywieziono na roboty przymusowe do Niemiec, z których powrócił w 1941 roku. Niestety w 1944 roku musiał ponownie opuścić Soszów – tym razem powołano go do niemieckiej armii. Po dezercji, powrócił do domu i ukrywał się do końca wojny.
    Nieobecność gospodarza w schronisku wykorzystał zabrzański Beskiden-Verein.
    Na Annie, prowadzącej w tym czasie schronisko, Niemcy wymusili dzierżawę obiektu. Próbowali także przejąć schronisko i pozbyć się z niego dotychczasowych właścicieli, lecz ich starania nie powiodły się. Po wojnie, schronisko zostało poważnie rozbudowane.'
    text2=''
    secondText = {false}
    />
    <Footer />
  </React.StrictMode>
)