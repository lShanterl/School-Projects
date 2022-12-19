import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import Hero from './components/Hero/hero'
import Footer from './components/Footer/footer'
import ShelterDescription from './components/body/shelterDescription'
import ResetScrollPosition from './components/body/resetScroll'



const MainKlimczok = () => {

  return (
    <div>
    <ResetScrollPosition />
      <Hero hero_image='assets/klimczok.jpg' header='Schronisko' sub_text='Klimczok'/>
          <ShelterDescription 
          shelter_image='assets/klimczok.jpg' 
          image1='assets/klimczok1.jpg'
          image2='assets/klimczok2.jpg' 
          head1='Klementynówka' 
          head2='Legendarny zbójnik' 
          text1='Widoczny na fotografii budynek schroniska na Klimczoku powstał w 1914 roku z inicjatywy niemieckiego Towarzystwa Beskidzkiego (Beskidenverein) z Bielska. Co ciekawe, nie był to pierwszy budynek. Pierwotnie znajdował w tym miejscu domek, który służył myśliwym za schronienie podczas polowań. Miejsce nazwano na cześć właścicielki okolicznych dóbr Klementyny von Primavesi „Klementynówką” (Klementinenhütte). Z czasem budynek rozbudowano, jednak w dniu otwarcia 5.05.1895 spłonął. Po odbudowie ogień strawił go jeszcze dwukrotnie, w 1910 i w 1913, dlatego w końcu postawiono budynek murowany.
          W czasie II wojny światowej schronisko służyło między innymi jako miejsce nauki jazdy na nartach dla żołnierzy Wehrmachtu i jako punkt obserwacyjny Luftwaffe.'
          text2='Klimczok przed latami zwany był również jako Klimczak, zatem dzisiejsza nazwa niespecjalnie różni się od poprzedniczki. A wzięła się stąd, że na zachodnich   zboczach szczytu, znajduje się kilka niewielkich jaskiń. Według podań ludowych, w jednej z nich skrywał się półlegendarny zbójnik Klimczok. to właśnie od     nazwiska słynnego zbójnika, który działał pod koniec XVII wieku na terenie dzisiejszego żywiecko-śląskiego pogranicza, w epoce romantyzmu przylgnęła obecna nazwa tego szczytu. Co prawda, jeszcze na początku XIX w. góra nazywana była Goryczną Skałką lub zwyczajnie Skałką.'
          secondText = {true}
          />
      <Footer />
    </div>
)};
export default MainKlimczok

