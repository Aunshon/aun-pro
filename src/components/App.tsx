import {AunContactField} from 'aun-pack';
import { TextControl } from "@wordpress/components";
import { useDispatch, useSelect } from '@wordpress/data';

function App() {
	const store = 'aun-data';

	const { setFormData } = useDispatch( store );
	const formData = useSelect(
		select => select( store ).getFormData(),
		[]
	);
  return (
	<AunContactField>
		<TextControl
			label="Phone number"
			type='number'
			value={formData.phone ?? ''}
			onChange={value => setFormData('phone', value)}
		/>
	</AunContactField>
  )
}

export default App