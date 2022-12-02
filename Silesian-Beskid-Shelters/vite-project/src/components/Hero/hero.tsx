
import { Component } from 'react';
import { render } from 'react-dom';
import Navbar from '../Nav/navbar'
import { useEffect } from 'react';
import { useState } from 'react';

const Hero = (prop : {hero_image : string }) => {

    const hero_image = prop.hero_image;
    const backgroundImage = {
        backgroundImage: `url(${hero_image})`,
    }
    const header = "Schroniska";
    const sub_header = "W Beskidzie Śląskim";

    const [text , setText] = useState("");
    const [sub_text , setSubText] = useState("");
    useEffect(() => {
       const timeout = setTimeout(() => {
            setText(header.slice(0, text.length + 1));
       }, 125);
       
         return () => clearTimeout(timeout);
    }, [text]);

    useEffect(() => {
        const timeout = setTimeout(() => {
                setSubText(sub_header.slice(0, sub_text.length + 1));
        }, 120);

        return () => clearTimeout(timeout);
    }, [sub_text]);


    
return(
    <div className="heroWrapper" style={backgroundImage}>
                <Navbar />
                <div className="hero">
                    <div className="heroText">
                        <h1 className='header '>{text}</h1>
                        <h4 className ='blinking-cursor'>{sub_text}</h4>
                        <button className="btn">Zobacz więcej</button>
                    </div>
                </div>
    </div>
)
}
export default Hero
