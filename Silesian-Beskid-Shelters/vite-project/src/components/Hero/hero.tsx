
import { Component } from 'react';
import { render } from 'react-dom';
import Navbar from '../Nav/navbar'
import { useEffect } from 'react';
import { useState } from 'react';
import { motion } from 'framer-motion';

import ScrollDown from './button';

const Hero = (prop : {hero_image : string, header : string, sub_text : string }) => {

    const hero_image = prop.hero_image;
    const backgroundImage = {
        backgroundImage: `url(${hero_image})`,
    }
    const header = prop.header;
    const sub_header = prop.sub_text;

    const [sub_text , setSubText] = useState("");

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
                        <motion.h1 
                        initial={{ opacity: 0 }}
                        whileInView={{ opacity: 1 }}
                        transition={{ anticipation: 0, duration: 0.8 }}
                        viewport={{once:true}}
                        className='header'>{header}</motion.h1>
                        <h4 className ='blinking-cursor'>{sub_text}</h4>
                        <ScrollDown />
                    </div>
                </div>
    </div>
)
}
export default Hero
