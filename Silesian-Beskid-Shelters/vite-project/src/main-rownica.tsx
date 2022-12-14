import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import Hero from './components/Hero/hero'
import Footer from './components/Footer/footer'
import ShelterDescription from './components/body/shelterDescription'
import ResetScrollPosition from './components/body/resetScroll'



const MainRownica = () => {

  return (
    <div>
    <ResetScrollPosition />
    <Hero hero_image='assets/rownicaHero.jpg' header='Schronisko' sub_text='Równica'/>
    <ShelterDescription 
    shelter_image='assets/stozek.jpg' 
    image1='assets/rownica1.jpg'
    image2='assets/rownica2.jpg' 
    head1='Schronisko?' 
    head2='Przebudowa' 
    text1='W 2016 roku dzierżawcy obiektu zrezygnowali ze statusu schroniska PTTK. Przekonywali, że nie są w stanie wyjść na swoje przy regulaminie PTTK gwarantującym np. turystom możliwość spożywania swojego własnego prowiantu.'
    text2='Dawne Schronisko w latach 60. XX wieku dokonano gruntownej przebudowy i remontu budynku. Wybudowano także asfaltową drogę z Ustronia, umożliwiającą całoroczny dojazd samochodem pod samo schronisko.'
    secondText={true}
    />
    <Footer />
    </div>
)};
export default MainRownica;