import { BrowserRouter, Route, Routes} from 'react-router-dom';
import Contact from './components/contact/contact';
import App from './App';
import MainBlatnia from './main-blatnia';
import MainKlimczok from './main-klimczok';
import MainRownica from './main-rownica';
import MainSkrzyczne from './main-skrzyczne';
import MainSoszow from './main-soszow';
import MainStozek from './main-stozek';
import MainSzyndzielnia from './main-szyndzielnia';
import MainPrzyslop from './main-przyslop';

function Wrapper() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<App />} />
        <Route path="/contact" element={<Contact />} />
        <Route path="/blatnia" element={<MainBlatnia />} />
        <Route path="/klimczok" element={<MainKlimczok />} />
        <Route path="/rownica" element={<MainRownica />} />
        <Route path="/skrzyczne" element={<MainSkrzyczne />} />
        <Route path="/soszow" element={<MainSoszow />} />
        <Route path="/stozek" element={<MainStozek />} />
        <Route path="/szyndzielnia" element={<MainSzyndzielnia />} />
        <Route path="/przyslop" element={<MainPrzyslop />} />
      </Routes>
    </BrowserRouter>
  );
}
export default Wrapper;


