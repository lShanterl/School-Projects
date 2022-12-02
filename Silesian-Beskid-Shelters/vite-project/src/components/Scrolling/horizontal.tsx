import React from 'react'
import ReactDOM from 'react-dom/client'
import { useRef, useEffect } from 'react'
import LocomotiveScroll from 'locomotive-scroll'
import '../../../node_modules/locomotive-scroll/dist/locomotive-scroll.css'

const HorizontalScroll = (props: { Section: React.FunctionComponent }) => {
    const mainref = useRef(null);

    let ScrollSection = props.Section;

    useEffect(() => {
        
        if(mainref) {
            const scroll = new LocomotiveScroll({
                el: mainref.current!,
                smooth: true,
                direction: 'horizontal',
                getDirection: true
            });
        }
        else{
            console.log("ref is null");
        }
    }, []);

    return (
        <div className="main-container">
            <div className="scroll-container" data-scroll-container ref={mainref}>
                <ScrollSection />
            </div>
        </div>
    )
}
export default HorizontalScroll