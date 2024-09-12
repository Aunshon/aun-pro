import {AunContactField, AunDisplayContact} from 'aun-pack';
import { TextControl } from "@wordpress/components";
import { useDispatch, useSelect } from '@wordpress/data';

function App() {
	const store = 'aun-data';

	const { setFormData, setFormExtensionData } = useDispatch( store );
	const formData = useSelect(
		select => {
			// @ts-ignore
			return select( store ).getFormExtensionData('aun-pro')
		},
		[]
	);
	const extensionData = useSelect(
		select => {
			// @ts-ignore
			return select( store ).getExtensionData('aun-pro')
		},
		[]
	);


  return (
		<>
			<AunDisplayContact>
				<h4><b>Extension - Phone: </b>{extensionData?.phone ?? ''}</h4>
				<h4><b>Extension - Email: </b>{extensionData?.email ?? ''}</h4>
			</AunDisplayContact>
			<AunContactField>
				<TextControl
					label="Phone number"
					type='number'
					value={formData?.phone ?? ''}
					onChange={value => setFormExtensionData('aun-pro', {...formData, phone: value })}
				/>
				<TextControl
					label="Email"
					type='email'
					value={formData?.email ?? ''}
					onChange={value => setFormExtensionData('aun-pro', {...formData, email: value })}
				/>
			</AunContactField>
		</>
  )
}

export default App
