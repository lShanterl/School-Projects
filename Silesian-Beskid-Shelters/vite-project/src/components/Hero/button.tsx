import {useRef} from 'react';
import { motion } from "framer-motion"


const ScrollDown = () => {
    const ref = useRef(null);
    const scrollToRef = (ref : any) => window.scrollTo(0, ref.current.offsetTop);   
    const executeScroll = () => scrollToRef(ref)

    const styles = {
    }

    return (

        <div>
            <motion.button 
            initial={{ opacity: 0}}
            whileInView={{ opacity: 1 }}
            animate={{ x: 0 }}
            transition={{duration: 0.7}}
            viewport={{once:true}}
            className="" onClick={executeScroll}>Przejdź Dalej!</motion.button>
            <div ref={ref} style={styles} ></div>
        </div>

    )
}
export default ScrollDown