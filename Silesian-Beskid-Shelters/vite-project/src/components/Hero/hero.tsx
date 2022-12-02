import { useState } from 'react'
import reactLogo from './assets/react.svg'
import Navbar from '../Nav/navbar'

const Hero = () => {
return(
    <div className="heroWrapper">
                <Navbar />
                <div className="hero">
                    <div className="heroText">
                        <h1>Schroniska</h1>
                        <h4>w Beskidzie Śląskim</h4>
                        <button className="btn">Zobacz więcej</button>
                    </div>
                </div>
    </div>
)
}
export default Hero
