import {useRef} from 'react';


const ScrollDown = () => {
    const ref = useRef(null);
    const scrollToRef = (ref : any) => window.scrollTo(0, ref.current.offsetTop);   
    const executeScroll = () => scrollToRef(ref)

    const styles = {
    }

    return (

        <div>
            <button className="" onClick={executeScroll}>Przejdź Dalej!</button>
            <div ref={ref} style={styles} ></div>
        </div>

    )
}
export default ScrollDown